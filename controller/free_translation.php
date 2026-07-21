<?php
session_start();
require_once __DIR__ . '/FreeTranslationAPI.php';

class TranslationController {
    private $translationAPI;
    
    public function __construct() {
        $this->translationAPI = new FreeTranslationAPI();
        
        // Initialize session language
        if (!isset($_SESSION['language'])) {
            $_SESSION['language'] = 'en';
        }
    }
    
    public function handleRequest() {
        $action = $_POST['action'] ?? '';
        
        switch ($action) {
            case 'translate':
                $this->translateText();
                break;
                
            case 'set_language':
                $this->setLanguage();
                break;
                
            case 'get_language':
                $this->getLanguage();
                break;
                
            case 'translate_batch':
                $this->translateBatch();
                break;
                
            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    }
    
    private function translateText() {
        $text = $_POST['text'] ?? '';
        $targetLang = $_POST['target'] ?? 'ar';
        $sourceLang = $_POST['source'] ?? 'en';
        
        if (empty(trim($text))) {
            echo json_encode([
                'status' => 'error',
                'message' => 'No text to translate'
            ]);
            return;
        }
        
        $translated = $this->translationAPI->translate($text, $targetLang, $sourceLang);
        
        echo json_encode([
            'status' => 'success',
            'original' => $text,
            'translated' => $translated,
            'target' => $targetLang
        ]);
    }
    
    private function setLanguage() {
        $language = $_POST['language'] ?? 'en';
        
        if (!in_array($language, ['en', 'ar'])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid language'
            ]);
            return;
        }
        
        $_SESSION['language'] = $language;
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Language set to ' . $language,
            'language' => $language
        ]);
    }
    
    private function getLanguage() {
        echo json_encode([
            'status' => 'success',
            'language' => $_SESSION['language'] ?? 'en'
        ]);
    }
    
    private function translateBatch() {
        $texts = $_POST['texts'] ?? [];
        $targetLang = $_POST['target'] ?? 'ar';
        $sourceLang = $_POST['source'] ?? 'en';
        
        if (!is_array($texts) || empty($texts)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'No texts to translate'
            ]);
            return;
        }
        
        $results = [];
        foreach ($texts as $text) {
            $results[] = $this->translationAPI->translate($text, $targetLang, $sourceLang);
        }
        
        echo json_encode([
            'status' => 'success',
            'translations' => $results
        ]);
    }
}

// Handle the request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new TranslationController();
    $controller->handleRequest();
}