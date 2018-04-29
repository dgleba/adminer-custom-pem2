<?php

//don't show strict warnings.  xataface group.. Re: Getting messages: Strict Standards: Only variables should be assigned by reference errors
//  ini_set('display_errors', '0');     # don't show any errors...
//  error_reporting(E_ALL | E_STRICT);  # ...but do log them
//report all errors for debugging...
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');
//

function adminer_object()
{
    // Required to run any plugin.
    include_once "./plugins/plugin.php";

    // Plugins auto-loader.
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    // Specify enabled plugins here.
    $plugins = [
    
        // new AdminerDatabaseHide(["mysql", "information_schema", "performance_schema"]),
        // new AdminerLoginServers([
            // filter_input(INPUT_SERVER, 'HTTP_HOST') => filter_input(INPUT_SERVER, 'SERVER_NAME')
        // ]),
        // new AdminerLoginServers(),

        new AdminerSimpleMenu(),
        new AdminerCollations(),
        new AdminerJsonPreview(),
        new AdminerTablesFilter(),

        //  allow sqlite with login-sqlite plugin and selecting sqlite3 server type and put full path to sqlite database file in database field.
        new AdminerLoginSqlite("sladmin", password_hash("sl", PASSWORD_DEFAULT)),

        // AdminerTheme has to be the last one.
        new AdminerTheme(),

        
   ];

   return new AdminerPlugin($plugins);
}

// Include original Adminer or Adminer Editor.
include "./adminer.php";
