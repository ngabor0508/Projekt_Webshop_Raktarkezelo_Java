package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;

import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Bejelentkezes;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Token;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.GridPane;

public class BejelentkezesController {
    @FXML
    private TextField inputEmail;
    @FXML
    private PasswordField inputPassword;
    @FXML
    private GridPane bejelentkezes_ablak;

    @FXML
    public void onBelepesButtonClick(ActionEvent actionEvent) {
    }
}
