<?php
class FreeTranslationAPI {
    private $cacheDir;
    private $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36';
    
    public function __construct() {
        $this->cacheDir = __DIR__ . '/../cache/translations/';
        if (!file_exists($this->cacheDir)) {
            mkdir($this->cacheDir, 0755, true);
        }
    }
    
    public function translate($text, $target = 'ar', $source = 'en') {
        // Clean text
        $text = trim($text);
        if (empty($text) || $target === $source) {
            return $text;
        }
        
        // Skip very short text or numbers
        if (strlen($text) < 2 || preg_match('/^[\d\s\.\,\-\+\$€₹]+$/', $text)) {
            return $text;
        }
        
        // Cache key
        $cacheKey = md5($text . $target . $source);
        $cacheFile = $this->cacheDir . $cacheKey . '.json';
        
        // Check cache (30 days)
        if (file_exists($cacheFile)) {
            $cacheData = json_decode(file_get_contents($cacheFile), true);
            if (time() - $cacheData['timestamp'] < 2592000) {
                return $cacheData['translation'];
            }
        }
        
        // Try multiple translation methods
        $translated = $this->tryTranslationMethods($text, $target, $source);
        
        // Save to cache
        $cacheData = [
            'timestamp' => time(),
            'translation' => $translated,
            'original' => $text,
            'source' => $source,
            'target' => $target
        ];
        file_put_contents($cacheFile, json_encode($cacheData));
        
        return $translated;
    }
    
    private function tryTranslationMethods($text, $target, $source) {
        // Try methods in order of reliability
        $methods = [
            'tryGoogleTranslate',
            'tryMyMemory',
            'tryLibreTranslate'
        ];
        
        foreach ($methods as $method) {
            try {
                $translated = $this->$method($text, $target, $source);
                if ($translated && $translated !== $text) {
                    return $translated;
                }
            } catch (Exception $e) {
                // Continue to next method
                continue;
            }
        }
        
        // Fallback: return original text
        return $text;
    }
    
    private function tryGoogleTranslate($text, $target, $source) {
        $url = "https://translate.googleapis.com/translate_a/single";
        
        $params = [
            'client' => 'gtx',
            'sl' => $source,
            'tl' => $target,
            'dt' => 't',
            'q' => $text
        ];
        
        $query = http_build_query($params);
        $fullUrl = $url . '?' . $query;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200 && $response) {
            $data = json_decode($response, true);
            if (isset($data[0][0][0])) {
                return $data[0][0][0];
            }
        }
        
        throw new Exception('Google Translate failed');
    }
    
    private function tryMyMemory($text, $target, $source) {
        $url = "https://api.mymemory.translated.net/get";
        $params = http_build_query([
            'q' => $text,
            'langpair' => $source . '|' . $target,
            'de' => 'user@example.com'
        ]);
        
        $fullUrl = $url . '?' . $params;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200 && $response) {
            $data = json_decode($response, true);
            if (isset($data['responseData']['translatedText'])) {
                return $data['responseData']['translatedText'];
            }
        }
        
        throw new Exception('MyMemory failed');
    }
    
    private function tryLibreTranslate($text, $target, $source) {
        // Try different LibreTranslate endpoints
        $endpoints = [
            'https://translate.argosopentech.com/translate',
            'https://libretranslate.com/translate'
        ];
        
        foreach ($endpoints as $url) {
            $data = [
                'q' => $text,
                'source' => $source,
                'target' => $target,
                'format' => 'text'
            ];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($httpCode === 200 && $response) {
                $result = json_decode($response, true);
                if (isset($result['translatedText'])) {
                    return $result['translatedText'];
                }
            }
        }
        
        throw new Exception('LibreTranslate failed');
    }
    
    public function translateBatch(array $texts, $target = 'ar', $source = 'en') {
        $results = [];
        foreach ($texts as $text) {
            $results[] = $this->translate($text, $target, $source);
        }
        return $results;
    }
}