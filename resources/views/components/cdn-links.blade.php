<!-- cdn-links.blade.php -->

<!-- Enlace al archivo CSS de select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

<!-- Enlace a Tailwind CSS -->
<link href="https://cdn.tailwindcss.com/?plugins=forms" rel="stylesheet">

<!-- Enlaces a los archivos JS de Jquery Select2 -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
    $(document).ready(function() {

        //Add frequencies
        $('#frequency-select').select2({
            placeholder: 'Selecciona frecuencia(s)',
            closeOnSelect: false,
            allowClear: true,
        });

        //Add categories
        $('#category-select').select2({
            placeholder: 'Selecciona categoria(s)',
            closeOnSelect: false,
            allowClear: true,
        });

        //Add producers
        $('#user-select').select2({
            placeholder: 'Selecciona productor(es)',
            closeOnSelect: false,
            allowClear: true,
        });

        //Add interpreters
        $('#interpreter-select').select2({
            placeholder: 'Selecciona interprete(s)',
            closeOnSelect: false,
            allowClear: true,
        });

        //Add genres
        $('#genre-select').select2({
            placeholder: 'Selecciona género(s)',
            closeOnSelect: false,
            allowClear: true,
        });

        //Filter table content
        function filterTable(tableId, searchText) {
            var $table = $('#' + tableId);
            var $rows = $table.find('tbody tr');

            $rows.hide().filter(function() {
                var text = $(this).text().toLowerCase();
                return text.indexOf(searchText.toLowerCase()) !== -1;
            }).show();
        }

        //Input event in search bar
        $('#searchInput').on('input', function() {
            var tableId = $(this).data('table-id');
            var searchText = $(this).val();
            filterTable(tableId, searchText);
        });

        //Sort in alphabetical order
        function sortTableAlphabetically(tableId, nameColumnIndex) {
            var rows = $('#' + tableId + ' tbody tr').get();

            rows.sort(function(a, b) {
                var nameA = $(a).find('td:eq(' + nameColumnIndex + ')').text().toUpperCase();
                var nameB = $(b).find('td:eq(' + nameColumnIndex + ')').text().toUpperCase();

                return nameA.localeCompare(nameB);
            });

            $.each(rows, function(index, row) {
                $('#' + tableId + ' tbody').append(row);
            });
        }

        //Sort in reverse alphabetical order
        function sortTableReverse(tableId, nameColumnIndex) {
            var rows = $('#' + tableId + ' tbody tr').get();

            rows.sort(function(a, b) {
                var nameA = $(a).find('td:eq(' + nameColumnIndex + ')').text().toUpperCase();
                var nameB = $(b).find('td:eq(' + nameColumnIndex + ')').text().toUpperCase();

                return nameB.localeCompare(nameA); //change the order
            });

            $.each(rows, function(index, row) {
                $('#' + tableId + ' tbody').append(row);
            });
        }

        // Event for sort 
        $('.sort-alphabetically, .sort-reverse').on('click', function() {
            var tableId = $(this).data('table-id');
            var nameColumnIndex;

            switch (tableId) {
                case 'stations-table':
                    nameColumnIndex = 2;
                    break;
                case 'programs-table':
                    nameColumnIndex = 2;
                    break;
                case 'audio-libraries-table':
                    nameColumnIndex = 3;
                    break;
                case 'podcasts-table':
                    nameColumnIndex = 2;
                    break;
                case 'music-table':
                    nameColumnIndex = 3;
                    break;
                case 'announcements-table':
                    nameColumnIndex = 2;
                    break;
                case 'broadcasts-table':
                    nameColumnIndex = 1;
                    break;
                case 'params-table':
                    nameColumnIndex = 1;
                    break;
                default:
                    console.error('Unrecognized Table :', tableId);
                    return;
            }

            if ($(this).hasClass('sort-alphabetically')) {
                sortTableAlphabetically(tableId, nameColumnIndex);
            } else if ($(this).hasClass('sort-reverse')) {
                sortTableReverse(tableId, nameColumnIndex);
            }
        });

        $('.sort-by-number').on('click', function() {
            var tableId = $(this).data('table-id');
            var order = $(this).data('sort');

            sortTableByNumber(tableId, order);
        });

        function sortTableByNumber(tableId, order) {
            var rows = $('#' + tableId + ' tbody tr').get();

            rows.sort(function(a, b) {
                var numberA = parseInt($(a).find('td:eq(0)').text());
                var numberB = parseInt($(b).find('td:eq(0)').text());

                return order === 'asc' ? numberA - numberB : numberB - numberA;
            });

            $.each(rows, function(index, row) {
                $('#' + tableId + ' tbody').append(row);
            });
        }
        flatpickr('.datetimepicker', {
            enableTime: true,
            dateFormat: 'Y-m-d H:i',
        });
    });
</script>
