$(document).ready(function () {
    fetchDocuments();
    $('#documentUploadForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        $('#errorMessages').addClass('d-none');
        $('#successMessage').addClass('d-none');

        $.ajax({
            type: 'POST',
            url: "/api/upload-document",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $('#successMessage').text(response.message).removeClass('d-none');
                    $('#documentContent').text(response.document.content);
                    fetchDocuments();
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                let errorHtml = '';
                for (let key in errors) {
                    errorHtml += '<li>' + errors[key] + '</li>';
                }
                $('#errorMessages').html(errorHtml).removeClass('d-none');
            }
        });
    });
    function fetchDocuments() {
        $.ajax({
            type: 'GET',
            url: '/api/list-documents',
            success: function (response) {
                if (response.success) {
                    let tableBody = $('#documentTable tbody');
                    tableBody.empty();
                    $.each(response.documents, function (index, document) {
                        tableBody.append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + document.document_name + '</td>' +
                            '<td>' + document.content.substring(0, 100) + '...</td>' +
                            '</tr>'
                        );
                    });
                }
            }
        });
    }
});
