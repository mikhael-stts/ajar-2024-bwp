<?php
require_once __DIR__ . "/../layout/header.php";
?>
<div class="container">
    <h1>Contoh JS/JQUERY</h1>
    <div class="row">
        <div class="col-12">
            <form id="form-add-anime">
                <div class="form-group">
                    <label for="anime-title">Title</label>
                    <input type="text" class="form-control" id="anime-title" name="anime-title" required>
                </div>
                <div class="form-group">
                    <label for="anime-image">Image URL</label>
                    <input type="url" class="form-control" id="anime-image" name="anime-image" required>
                </div>
                <div class="form-group">
                    <label for="anime-description">Description</label>
                    <textarea class="form-control" id="anime-description" name="anime-description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <div class="row mt-3" id="anime-list">
    </div>

    <script>
        let animeList = [];

        function showData() {
            $("#anime-list").html('');
            animeList.forEach(function(anime, index) {
                $("#anime-list").append(`
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <img src="${anime.image}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">${anime.title}</h5>
                                <p class="card-text">${anime.description}</p>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-danger" onclick="deleteAnime(${index})">Delete</button>
                            </div>
                        </div>
                    </div>
                `);
            });
        }

        $("#form-add-anime").submit(function(e) {
            e.preventDefault();
            let title = $("#anime-title").val();
            let image = $("#anime-image").val();
            let description = $("#anime-description").val();

            animeList.push({
                title,
                image,
                description
            });

            showData();

            //$("#anime-title").val('');
            //$("#anime-image").val('');
            //$("#anime-description").val('');
        });

        function deleteAnime(index) {
            animeList.splice(index, 1);
            showData();
        }
    </script>
</div>
<?php
require_once __DIR__ . "/../layout/footer.php";
?>