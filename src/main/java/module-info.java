module hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java {
    requires javafx.controls;
    requires javafx.fxml;


    opens hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java to javafx.fxml;
    exports hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;
}