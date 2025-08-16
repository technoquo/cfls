<?php
return [
    'accepted'             => 'Le champ :attribute doit être accepté.',
    'active_url'           => 'Le champ :attribute n’est pas une URL valide.',
    'after'                => 'Le champ :attribute doit être une date postérieure au :date.',
    'alpha'                => 'Le champ :attribute doit seulement contenir des lettres.',
    // ... all other rules ...
    'between'              => [
        'numeric' => 'Le champ :attribute doit être entre :min et :max.',
        'file'    => 'Le fichier :attribute doit être entre :min et :max kilo-octets.',
        'string'  => 'Le texte :attribute doit contenir entre :min et :max caractères.',
        'array'   => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
    ],
    // etc.

    'custom' => [
        'email' => [
            'required' => 'Nous avons besoin de votre adresse e-mail.',
            'email' => "Le format de l'adresse e-mail n'est pas valide.",
        ],
        'password' => [
            'required' => 'Veuillez entrer un mot de passe.',
            'min' => 'Le mot de passe doit contenir au moins :min caractères.',
        ],
        // Add your field-specific custom messages here
    ],


    'failed'   => 'Ces identifiants ne correspondent pas à nos enregistrements.',
    'password' => 'Le mot de passe fourni est incorrect.',
    'throttle' => 'Trop de tentatives de connexion. Veuillez réessayer dans :seconds secondes.',
    'unique' => 'La valeur du champ :attribute est déjà utilisée.',
    'confirmed' => 'La confirmation du champ :attribute ne correspond pas.',

    'attributes' => [
        'email' => 'adresse e-mail',
        'password' => 'mot de passe',
        'name' => 'nom',
        // Map other attribute names if you want nicer labels in messages
    ],
];
