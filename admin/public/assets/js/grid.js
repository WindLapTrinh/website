(function () {
    'use script';
   
    /* AssignedDate Picker */
    flatpickr("#assignedDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    /* DueDate Picker */
    flatpickr("#dueDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
})();