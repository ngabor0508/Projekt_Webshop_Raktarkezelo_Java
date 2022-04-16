module hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java {
    requires javafx.controls;
    requires javafx.fxml;
    requires com.google.gson;

    opens hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java to javafx.fxml, com.google.gson;
    exports hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;
    exports hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;
    opens hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers to javafx.fxml;
    exports hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.api;
    opens hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.api to com.google.gson, javafx.fxml;
    exports hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok;
    opens hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok to com.google.gson, javafx.fxml;
}