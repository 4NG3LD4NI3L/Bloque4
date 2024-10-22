<?php

function getProducts() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 455|wZ5JHpqwJbYLsxlMomF2bVMtGT9KFtM2uWyOC8ey',
            'Cookie: XSRF-TOKEN=eyJpdiI6IjZuVnRuZVN2ckRQd2ltRnVKZTk3QlE9PSIsInZhbHVlIjoiOGR5cW4yMnd4Zk50TUNldWxrUVBmbmx3blVNbjIwUXpkaTZoQ3NsNzE5cVhteDRzY1VNR09ZSDB5V0poSm14N29yWTZjMStCYTZKbU9uVHFIZ1JZVVVtVE4xM0hKYUg5bURHdldkUmxZWFdvMlhzY1dsYVJUR2lTZ2E4MDBaUk0iLCJtYWMiOiIwMDYzOWZhMTVlMTRmNzE2NjhjMGY2YzgwM2FiZGQwNzliMjc2ZGIzM2Y3MGM2NjdmZDgxOTcwZDBhY2VhZWE2IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6InF2SmpEeEJJOWs2bkV4R1Q5Zk5BNEE9PSIsInZhbHVlIjoieFdKbElTVkNZVGorWW8ydEtEWWtTc0kzRHFwTG9sdDBJK1dCbHliS1Jwd1l4L3Mrb1VoaUJSa09GUis2OXc1RC9GZGI2em1HMGRVaWJnSmk1SlRGcElRRFQ1ZWl5akFiK1BLMmJhVU1CMXNZZjlvT1lleFVkdy9EdVU0Q2lGaWgiLCJtYWMiOiJlYjQ2MGQzZjBjYjBmMDlhNjhhZTc4ZDM0MjZhMTU1ZjQwZTk1MTlhZDkyMWRiY2YyZjYzMjllZDc3YTJjZjdmIiwidGFnIjoiIn0%3D'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);

    return isset($data['data']) ? $data['data'] : [];
}

function getProductDetails() {
   
    $id = $_GET['id']; 

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://crud.jonathansoto.mx/api/products/$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 455|wZ5JHpqwJbYLsxlMomF2bVMtGT9KFtM2uWyOC8ey',
            'Cookie: XSRF-TOKEN=eyJpdiI6IjZuVnRuZVN2ckRQd2ltRnVKZTk3QlE9PSIsInZhbHVlIjoiOGR5cW4yMnd4Zk50TUNldWxrUVBmbmx3blVNbjIwUXpkaTZoQ3NsNzE5cVhteDRzY1VNR09ZSDB5V0poSm14N29yWTZjMStCYTZKbU9uVHFIZ1JZVVVtVE4xM0hKYUg5bURHdldkUmxZWFdvMlhzY1dsYVJUR2lTZ2E4MDBaUk0iLCJtYWMiOiIwMDYzOWZhMTVlMTRmNzE2NjhjMGY2YzgwM2FiZGQwNzliMjc2ZGIzM2Y3MGM2NjdmZDgxOTcwZDBhY2VhZWE2IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6InF2SmpEeEJJOWs2bkV4R1Q5Zk5BNEE9PSIsInZhbHVlIjoieFdKbElTVkNZVGorWW8ydEtEWWtTc0kzRHFwTG9sdDBJK1dCbHliS1Jwd1l4L3Mrb1VoaUJSa09GUis2OXc1RC9GZGI2em1HMGRVaWJnSmk1SlRGcElRRFQ1ZWl5akFiK1BLMmJhVU1CMXNZZjlvT1lleFVkdy9EdVU0Q2lGaWgiLCJtYWMiOiJlYjQ2MGQzZjBjYjBmMDlhNjhhZTc4ZDM0MjZhMTU1ZjQwZTk1MTlhZDkyMWRiY2YyZjYzMjllZDc3YTJjZjdmIiwidGFnIjoiIn0%3D'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);

    return isset($data['data']) ? $data['data'] : null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addProduct(
        $_POST['name'],
        $_POST['slug'],
        $_POST['description'],
        $_POST['features']
    );
}

function addProduct($name, $slug, $description, $features) {
    $curl = curl_init();

   

    $data = [
        'name' => $name,
        'slug' => $slug,
        'description' => $description,
        'features' => $features,
    ];

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 455|wZ5JHpqwJbYLsxlMomF2bVMtGT9KFtM2uWyOC8ey',
            'Content-Type: multipart/form-data',
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $responseData = json_decode($response, true);

    if (isset($responseData['success']) && $responseData['success']) {
        echo "Producto agregado correctamente.";
        header("Location: pag.php");
    } else {
        echo "Error al agregar el producto: " . ($responseData['message'] ?? 'Desconocido');
        header("Location: pag.php");
    }
}

?>
