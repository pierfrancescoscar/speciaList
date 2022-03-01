
classes = document.querySelectorAll('.checked-category');

console.log(classes.length);  //DA ELIMINARE

for(i=0; i < classes.length; i++) {

    classes[i].addEventListener('click', function(){

        let flagChecked = false;

        let CheckboxChecked = document.querySelectorAll('.checked-category:checked');

        console.log(CheckboxChecked.length);  //DA ELIMINARE

        if(CheckboxChecked.length > 0) {
            flagChecked = true;
        }

        console.log(flagChecked);  //DA ELIMINARE

        let allCheckbox = document.querySelectorAll('.checked-category');

        console.log(allCheckbox.length);  //DA ELIMINARE

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
