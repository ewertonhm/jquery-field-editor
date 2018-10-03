# jquery field editor

This is a jQuery plugin that allows for elements to be editable by clicking on them. This
plugin makes an AJAX call to your endpoint.


### How do I get set up? ###

* Step 1. Load plugin after you load jQuery

```javascript
  <script type="text/javascript" src="/js/edit.js"></script>
```

* Step 2. Add HTML element
    * data-id attribute is the primary key in the database
    * data-field is the column name in the database to be updated
    * data-input can be 'input' for single line fields or 'textarea' for multi-line fields or 'select' for select box

```html
  <h3 id="editHeader" data-id="4" data-field="title" data-input="input">Starting Text</h3>
```

* Step 3. Add your success function

```javascript
  function success(resp){
    //handle your response here
    console.log(resp);
  }
```

* Step 4. Instantiate your plugin

```javascript
  $('document').ready(function(){
    // create your options object
    var options = {url:'/parsers/updateParser.php'};
    $('#editHeader').oneClickEdit(options,success);
  });
```

    * Options
        * data - object of additional information to post to parser file
        * allowNull - boolean to allow for an empty value to be sent. Defaults to False
        * onblur - this option will allow you to send a callback function instead of using the default AJAX call with success function
        * selectOptions - object {option_value : option text} if you are using select as input type you will need this object passed for the select options