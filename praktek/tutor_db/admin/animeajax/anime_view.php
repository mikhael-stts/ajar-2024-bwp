<?php
require_once __DIR__ . '/../../layout/header.php';
if (!isset($_SESSION['yanglogin']) || $_SESSION['yanglogin']['pengguna_role'] !== 'admin') {
    header('Location: ../../index.php');
    exit;
}
?>
<div class="container mt-5">
    <h1 class="mb-4">Master Anime Pakai Ajax</h1>
    <form id="animeForm" class="mb-5">
        <input type="hidden" id="editIndex" name="editIndex" value="">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anime</label>
            <input type="text" id="anime_name" class="form-control" name="anime_name" required>
        </div>

        <!-- create select box with genreList as options -->
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select id="genre_id" class="form-select" name="genre_id" required>
                <!-- Genres will be populated dynamically -->
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
            <input type="text" id="anime_year" class="form-control" name="anime_year" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">URL Gambar</label>
            <input type="url" id="anime_image" class="form-control" name="anime_image" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="anime_description" class="form-control" name="anime_description" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h2 class="mb-3">Anime List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Genre</th>
                <th>Tanggal Rilis</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="animeList">
            <!-- Anime data will be populated dynamically -->
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        // Fetch genres and anime list on page load
        fetchGenres();
        fetchAnimeList();

        // Submit form using jQuery AJAX
        $('#animeForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: 'anime_controller.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    const data = JSON.parse(response);
                    alert(data.message);
                    fetchAnimeList(); // Refresh list after submit
                    resetForm();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });

    // Fetch genres and populate the select box
    function fetchGenres() {
        $.ajax({
            type: "GET",
            url: "anime_controller.php?tipe=genres",
            dataType: "json",
            success: function(response) {
                $('#genre_id').empty();
                $.each(response, function(index, genre) {
                    $('#genre_id').append(`<option value="${genre.genre_id}">${genre.genre_name}</option>`);
                });
            }
        });
    }

    // Fetch anime list and display in the table
    function fetchAnimeList() {
        $.ajax({
            type: "GET",
            url: "anime_controller.php?tipe=anime",
            dataType: "json",
            success: function(response) {
                $('#animeList').empty();
                console.log(response);

                $.each(response, function(index, anime) {
                    $("#animeList").append(`
                    <tr>
                        <td>${anime.anime_id}</td>
                        <td>${anime.anime_name}</td>
                        <td>${anime.genre_name}</td>
                        <td>${anime.anime_year}</td>
                        <td><img src="${anime.anime_image}" alt="Gambar" width="100"></td>
                        <td>${anime.anime_description}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editAnime(${anime.anime_id})">Edit</button>
                            <button class="btn btn-danger" onclick="deleteAnime(${anime.anime_id})">Delete</button>
                        </td>
                    </tr>
                    `);
                });
            }
        });
    }

    // Populate the form for editing an anime
    function editAnime(id) {
        $.ajax({
            type: "GET",
            url: `anime_controller.php?edit=${id}`,
            dataType: "json",
            success: function(response) {
                const anime = response;
                $('#editIndex').val(anime.anime_id);
                $('#anime_name').val(anime.anime_name);
                $('#genre_id').val(anime.genre_id);
                $('#anime_year').val(anime.anime_year);
                $('#anime_image').val(anime.anime_image);
                $('#anime_description').val(anime.anime_description);
            }
        });
    }

    // Delete an anime using jQuery AJAX
    function deleteAnime(id) {
        if (confirm('Are you sure you want to delete this anime?')) {
            $.ajax({
                url: 'anime_controller.php',
                type: 'POST',
                data: {
                    deleteIndex: id
                },
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    fetchAnimeList(); // Refresh list after delete
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    }

    // Reset the form fields
    function resetForm() {
        $('#editIndex').val('');
        console.log($('#animeForm'));

        $('#animeForm')[0].reset(); // Reset form fields
    }
</script>

<?php
require_once __DIR__ . '/../../layout/footer.php';
?>