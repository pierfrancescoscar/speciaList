
classes = document.querySelectorAll('.checked-category');

for(i=0; i < classes.length; i++) {

    classes[i].addEventListener('click', function(){

        let flagChecked = false;

        let CheckboxChecked = document.querySelectorAll('.checked-category:checked');

        if(CheckboxChecked.length > 0) {
            flagChecked = true;
        }

        let allCheckbox = document.querySelectorAll('.checked-category');

        if(flagChecked == true) {
            for (i = 0; i < allCheckbox.length; i++) {
                allCheckbox[i].required = false;
            }
        } else {
            for (i = 0; i < allCheckbox.length; i++) {
                allCheckbox[i].required = true;
            }
        }
    })
}
