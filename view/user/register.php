
<div class="container">
    <?php if (isset($error) && !empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <form action="" method="post">

        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">Régions</label>
            <select class="form-control" id="region" onchange="getData('region', 'departements')">
                <option value=""></option>
                <?php foreach ($regions as $region): ?>
                <option value="<?= $region->getCode() ?>"><?= $region->getName() ?></option>
                <?php endforeach; ?>
            </select>
            <div id="departements"></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>

<script>


    function getData(target_id, next_target)
    {
        let myHeaders = new Headers();
        myHeaders.append("is-ajax", true);
        const selectedElement = document.getElementById(target_id)
        fetch("<?= $_SERVER['REQUEST_SCHEME' ]?>://<?= $_SERVER['SERVER_NAME' ]?><?= BASE_URI ?>/"+next_target+'/'+selectedElement.value, {
            headers : myHeaders
        })
            .then(function(response) {
                return response.text();
            }).then(function (htmlResponse){

            document.getElementById(next_target).innerHTML = htmlResponse
        })
    }
</script>