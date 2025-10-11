<?php
    return[
        "required" => ":attributeは必須です。",
        "string" => "文字を入力してください。",
        "max" => ":attributeは:max文字以内で入力してください。",
        "valid_google_map_url" => "有効なgoogle mapの共通リンクではありません。",
        "custom" => [
            "images" => [
                "required" => "画像は必須です。",
                "array" => "画像は配列で入力してください。",
                "min" => "画像は:min枚以上選択してください。",
            ],
            "images.*" => [
                "image" => "画像ファイルを選択してください。",
                "mimes" => "jpeg,png,jpg,gif,svg形式の画像を選択してください。",
                "max" => "画像は2MB以内でアップロードしてください。",
            ],
            "pins" => [
                "required" => "マップにピンを一本以上設定してください。",
            ]
        ],
        "attributes" => [
            "title" => "タイトル",
            "map_url" => "MAP URL",
            "detail" => "詳細",
        ]
    ];
?>