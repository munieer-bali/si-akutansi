// Inisialisasi DataTable
let table = new DataTable('#myTable', {
    columnDefs: [
        {
            targets: [0, 2],
            orderable: false
        }
    ]
});


// Get the current URL without the trailing slash
var path = location.pathname.split('/');
var url = location.origin + '/' + path[1];

// Loop through the menu items
$('ul.nav nav-treeview li a').each(function () {
    // If the menu item's href attribute contains the current URL
    if ($(this).attr('href').indexOf(url) !== -1) {
        // Add 'active' class to the menu item and its ancestors
        $(this).parent().addClass('active')
            .parent()
            .parent('li')
            .addClass('active');
    }
});
