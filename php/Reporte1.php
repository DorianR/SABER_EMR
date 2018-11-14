<?php
if (defined('CRYPT_BLOWFISH') && CRYPT_BLOWFISH)
{
    echo crypt('Mi querido password', '$2y$07$esteesuntextoaleatoreo$');
    // Resulta en: $2y$07$esteesuntextoaleatoree24BQCnGmh2nNpnOeQkUe4cw9x191XD6
    echo crypt('Mi querido password', '$2y$10$esteesuntextoaleatoreo$');
    // Resulta en: $2y$10$esteesuntextoaleatoreekeSBOneABcQ6MqJX3leod5vQkI.RyLS
    echo crypt('rasmuslerdorf', '$2y$07$usesomesillystringforsalt$');
    // Resulta en: $2y$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi
}
else { die('No hay soporte para Bcrypt!'); }
?>