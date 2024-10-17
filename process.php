<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enlace = $_POST['enlace'];
    $categoria = $_POST['categoria'];
    $logo = $_POST['logo'];
    $key = $_POST['key'];

    $nuevoCanal = "#EXTINF:-1 group-title=\"$categoria\" tvg-logo=\"$logo\" ,Canal\n";
    $nuevoCanal .= "#EXTVLCOPT:network-caching=1000\n";
    $nuevoCanal .= "#EXTVLCOPT:http-user-agent=\"FireFox\"\n";
    $nuevoCanal .= "#EXTVLCOPT--http-reconnect=true\n";
    $nuevoCanal .= "#KODIPROP:inputstreamaddon=inputstream.adaptive\n";
    $nuevoCanal .= "#KODIPROP:inputstream.adaptive.manifest_type=mpd\n";
    $nuevoCanal .= "#KODIPROP:inputstream.adaptive.license_type=clearkey\n";
    $nuevoCanal .= "#KODIPROP:inputstream.adaptive.license_key=$key\n";
    $nuevoCanal .= "$enlace\n";

    $archivo = 'mikito.json';
    file_put_contents($archivo, $nuevoCanal, FILE_APPEND | LOCK_EX);

    echo "Canal agregado correctamente.";
} else {
    echo "Método no permitido.";
}
?>
