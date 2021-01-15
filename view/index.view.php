<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="view/css/bootstrap.min.css"


</head>
<body>
<div class="container">

    <?php $validation_errors = []; ?>

    <?php if (isset($_POST['send'])): ?>
        <?php

        if (empty($_POST['vardas']) || !preg_match('/[A-Z]/', $_POST['vardas'])) {
            $validation_errors[] = "Vardas turi prasidėti didžiąja raide ir nėra tusčias";
        }
        if (empty($_POST['pavardė']) || !preg_match('/[A-ZŠė]/', $_POST['pavardė'])) {
            $validation_errors[] = "Pavardė turi prasidėti didžiąja raide ir nėra tusčias";
        }
        if (empty($_POST['žinutė']) || !preg_match('/^[A-Za-z0-9]{1,200}$/', $_POST['žinutė'])) {
            $validation_errors[] = "Žinutė per ilga!";
        }
        ?>
    <?php endif; ?>

    <div class="bg-primary text-light text-center">
        <h2>Formos duomenys</h2>
    </div>

    <?php if (isset($_POST['send']) && empty($validation_errors)): ?>

        <section>
            <ul>
                <?php foreach ($_POST as $field => $value): ?>
                    <?php if ($field != "send"): ?>
                        <li><span><?= htmlspecialchars(ucfirst($field)); ?>: </span><?= htmlspecialchars($value); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </section>

    <?php else: ?>

        <?php foreach ($validation_errors as $errors): ?>
            <div class="alert-danger m-2" role="alert">
                <?= $errors; ?>
            </div>
        <?php endforeach; ?>

        <form method="post">
            <div class="form-group">
                <label for="name">Vardas:</label>
                <input type="text" name="vardas" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">Pavardė:</label>
                <input type="text" name="pavardė" id="lastname" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">El. paštas:</label>
                <input type="text" name="el.apštas" id="email" class="form-control">
            </div>
            <div class="form-group">
                <select class="form-control" name="skyrius" aria-label="fault select example" name>
                    <option selected>--Pasirinkite departamentą</option>
                    De
                    <?php for ($i = 0; $i < count($departaments); $i++): ?>
                        <option><?= ucfirst($departaments[$i]) ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Jūsų žinutė:</label>
                <input type="text" name="žinutė" id="message" class="form-control">
            </div>
            <button type="submit" name="send" id="send" class="mt-3 btn btn-primary btn-lg text-center">Siusti</button>
        </form>
    <?php endif ?>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
