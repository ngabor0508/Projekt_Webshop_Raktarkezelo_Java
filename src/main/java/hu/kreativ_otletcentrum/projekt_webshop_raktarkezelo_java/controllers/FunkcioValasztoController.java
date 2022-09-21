package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;

import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Controller;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.RaktarKezeloApp;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.api.BejelentkezesApi;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Felhasznalo;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Token;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

import java.io.IOException;

public class FunkcioValasztoController extends Controller {
    @FXML
    private GridPane funkcio_ablak;

    @FXML
    public void onFelhasznalokClick(ActionEvent actionEvent) {
    }

    @FXML
    public void onTermekekClick(ActionEvent actionEvent) {
        try {
                ((Stage) funkcio_ablak.getScene().getWindow()).close();
                MainController main = (MainController) ujAblak(
                        "/hu/kreativ_otletcentrum/projekt_webshop_raktarkezelo_java/fxml/main-view.fxml", "Kreatív Ötletcentrum Raktárkezelő", 1300, 700
                );
                main.getStage().show();
            } catch (IOException e) {
            hibaKiir(e);
        }
    }

    @FXML
    public void onRendelesekClick(ActionEvent actionEvent) {
    }
}
