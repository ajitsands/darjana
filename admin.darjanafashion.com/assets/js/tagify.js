/**
 * Tagify
 */

'use strict';

(function () {
  // Basic
  //------------------------------------------------------
  const tagifyBasicEl = document.querySelector('#TagifyBasic');
  const TagifyBasic = new Tagify(tagifyBasicEl);

  // Read only
  //------------------------------------------------------
  const tagifyReadonlyEl = document.querySelector('#TagifyReadonly');
  const TagifyReadonly = new Tagify(tagifyReadonlyEl, { readOnly: true });

  // Custom list & inline suggestion
  //------------------------------------------------------
  const tagifyCustomInlineSuggestionEl = document.querySelector('#TagifyCustomInlineSuggestion');
  const tagifyCustomListSuggestionEl = document.querySelector('#TagifyCustomListSuggestion');

  const whitelist = [
    'A# .NET', 'A# (Axiom)', 'A-0 System', 'A+', 'A++', 'ABAP', 'ABC', 'ABC ALGOL', 'ABSET', 'ABSYS', 'ACC', 'Accent',
    'Ace DASL', 'ACL2', 'Avicsoft', 'ACT-III', 'Action!', 'ActionScript', 'Ada', 'Adenine', 'Agda', 'Agilent VEE',
    'Agora', 'AIMMS', 'Alef', 'ALF', 'ALGOL 58', 'ALGOL 60', 'ALGOL 68', 'ALGOL W', 'Alice', 'Alma-0', 'AmbientTalk',
    'Amiga E', 'AMOS', 'AMPL', 'Apex (Salesforce.com)', 'APL', 'AppleScript', 'Arc', 'ARexx', 'Argus', 'AspectJ',
    'Assembly language', 'ATS', 'Ateji PX', 'AutoHotkey', 'Autocoder', 'AutoIt', 'AutoLISP / Visual LISP', 'Averest',
    'AWK', 'Axum', 'Active Server Pages', 'ASP.NET'
  ];

  // Inline
  let tagifyCustomInlineSuggestion = new Tagify(tagifyCustomInlineSuggestionEl, {
    whitelist: whitelist,
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      classname: 'tags-inline',
      enabled: 0,
      closeOnSelect: false
    }
  });

  // List
  let tagifyCustomListSuggestion = new Tagify(tagifyCustomListSuggestionEl, {
    whitelist: whitelist,
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      classname: '',
      enabled: 0,
      closeOnSelect: false
    }
  });

  // Users List suggestion
  //------------------------------------------------------
  const tagifyUserListEl = document.querySelector('#TagifyUserList');

  // Fetch user list via Ajax
  $.post('ajaxAdduser', { action: 'select_users_taggify' })
    .done(function (response) {
      
      try {
          const parsedResponse = JSON.parse(response);
            const usersList = parsedResponse.map(user => ({
                value: user.id,
                name: user.first_name+' '+last_name,
                email: user.email
            }));

        function tagTemplate(tagData) {
          return `
            <tag title="${tagData.title || tagData.email}"
              contenteditable='false'
              spellcheck='false'
              tabIndex="-1"
              class="${this.settings.classNames.tag} ${tagData.class ? tagData.class : ''}"
              ${this.getAttributes(tagData)}
            >
              <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
              <div>
                <span class='tagify__tag-text'>${tagData.name}</span>
              </div>
            </tag>
          `;
        }

        function suggestionItemTemplate(tagData) {
          return `
            <div ${this.getAttributes(tagData)}
              class='tagify__dropdown__item align-items-center ${tagData.class ? tagData.class : ''}'
              tabindex="0"
              role="option"
            >
              <div class="fw-medium">${tagData.name}</div>
              <span>${tagData.email}</span>
            </div>
          `;
        }

        function dropdownHeaderTemplate(suggestions) {
          return `
            <div class="${this.settings.classNames.dropdownItem} ${this.settings.classNames.dropdownItem}__addAll">
                <strong>${this.value.length ? 'Add remaining' : 'Add All'}</strong>
                <span>${suggestions.length} members</span>
            </div>
          `;
        }

        let tagifyUserList = new Tagify(tagifyUserListEl, {
          tagTextProp: 'name',
          enforceWhitelist: true,
          skipInvalid: true,
          dropdown: {
            closeOnSelect: false,
            enabled: 0,
            classname: 'users-list',
            searchKeys: ['name', 'email']
          },
          templates: {
            tag: tagTemplate,
            dropdownItem: suggestionItemTemplate,
            dropdownHeader: dropdownHeaderTemplate
          },
          whitelist: usersList
        });

        // attach event listeners
        tagifyUserList.on('dropdown:select', onSelectSuggestion)
          .on('edit:start', onEditStart);

        function onSelectSuggestion(e) {
          if (e.detail.elm.classList.contains(`${tagifyUserList.settings.classNames.dropdownItem}__addAll`)) {
            tagifyUserList.dropdown.selectAll();
          }
        }

        function onEditStart({ detail: { tag, data } }) {
          tagifyUserList.setTagTextNode(tag, `${data.name} <${data.email}>`);
        }
      } catch (error) {
        console.error('Error processing user list:', error);
      }
    })
    .fail(function (xhr, status, error) {
      console.error('Failed to fetch user list:', error);
    });

  // Email List suggestion
  //------------------------------------------------------
  let randomStringsArr = Array.from({ length: 100 }, () =>
    `${Array.from({ length: ~~(Math.random() * 10 + 3) }, () =>
      String.fromCharCode(Math.random() * (123 - 97) + 97)
    ).join('')}@gmail.com`
  );

  const tagifyEmailListEl = document.querySelector('#TagifyEmailList');
  const tagifyEmailList = new Tagify(tagifyEmailListEl, {
    pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
    whitelist: randomStringsArr,
    callbacks: { invalid: onInvalidTag },
    dropdown: { position: 'text', enabled: 1 }
  });

  const button = tagifyEmailListEl.nextElementSibling;

  button.addEventListener('click', onAddButtonClick);

  function onAddButtonClick() {
    tagifyEmailList.addEmptyTag();
  }

  function onInvalidTag(e) {
    console.log('invalid', e.detail);
  }
})();
