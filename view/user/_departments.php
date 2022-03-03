<select class="form-control">
    <?php foreach ($departements as $departement): ?>
        <option value="<?= $departement->getCode() ?>"><?= $departement->getName() ?></option>
    <?php endforeach; ?>
</select>