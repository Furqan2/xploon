$(document).ready(function() {
    $('#table').DataTable();
});
const myButton = document.querySelector('#refreshBtn');
myButton.addEventListener('click', () => {
    // Send a POST request to the controller function
    fetch('/getData')
        .then(response => response.json())
        .then(data => {
            // Update the DOM with the data
            let dynamicHtml = '';

            // Loop through the data and generate dynamic HTML
            $.each(data.data.headers, function(index, item) {
                dynamicHtml += `
                    <th class="text-center">${item}</th>`;
            });

            // Update the content of the myDiv placeholder with the dynamic HTML
            $('#thUp').html(dynamicHtml);
            let dynamicHtmlTable = '';

            // Loop through the data and generate dynamic HTML
            $.each(data.data.rows, function(index, item) {
                dynamicHtmlTable += `<tr>
                    <td>${item.id}</td>
                    <td>${item.fname}</td>
                    <td>${item.lname}</td>
                    <td>${item.email}</td>
                    <td>${new Date(item.date).toLocaleDateString("en-US")}</td>
                    </tr>`;
            });
            // Update the content of the myDiv placeholder with the dynamic HTML
            $('#tableBody').html(dynamicHtmlTable);
        });
});