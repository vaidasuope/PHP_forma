<?php
$validation_errors = [];
function validate($data)
{

    global $validation_errors;

    if (empty($_POST['vardas']) || !preg_match('/[A-Z]/', $_POST['vardas'])) {
        $validation_errors[] = "Vardas turi prasidėti didžiąja raide ir negali būti tuščias";
    }
    if (empty($_POST['pavardė']) || !preg_match('/[A-ZŠė]/', $_POST['pavardė'])) {
        $validation_errors[] = "Pavardė turi prasidėti didžiąja raide ir negali būti tuščias";
    }
    if (empty($_POST['žinutė']) || !preg_match('/^[A-Za-z0-9]{1,200}$/', $_POST['žinutė'])) {
        $validation_errors[] = "Žinutė per ilga!";
    }
    return $validation_errors;
}

function printData()
{
    $data = 'data/message.txt';
    $content = file_get_contents($data);
    $formData = implode(',', $_POST);
    $content .= $formData . "/n";
    file_put_contents($data, $content);

    $messages = file_get_contents('data/message.txt', true);
    $messages = explode('/n', $messages);


    foreach ($messages as $message) {
        echo "<tr></tr>";
        $messagePO = explode(',', $message);
        foreach ($messagePO as $value) {
            echo "<td>$value</td>";
        }
    }
}