package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;

import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Controller;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.RaktarKezeloApp;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.api.BejelentkezesApi;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Bejelentkezes;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Felhasznalo;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Token;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

import java.io.IOException;

public class BejelentkezesController extends Controller{
    @FXML
    private TextField inputEmail;
    @FXML
    private PasswordField inputPassword;
    @FXML
    private GridPane bejelentkezes_ablak;

    @FXML
    public void onBelepesButtonClick(ActionEvent actionEvent) {
        String login_email = inputEmail.getText().trim();
        String login_password = inputPassword.getText().trim();

        Bejelentkezes bejelentkezes = new Bejelentkezes(login_email, login_password);

        try {
            Token token = BejelentkezesApi.postBejelentkezes(bejelentkezes);
            Felhasznalo felhasznaloAdatok = BejelentkezesApi.getBejelentkezesAdatok(token.getToken());

            if(felhasznaloAdatok.getPermission()) {
                RaktarKezeloApp.nev = felhasznaloAdatok.getName();
                ((Stage) bejelentkezes_ablak.getScene().getWindow()).close();
                FunkcioValasztoController funkcio = (FunkcioValasztoController) ujAblak(
                        "/hu/kreativ_otletcentrum/projekt_webshop_raktarkezelo_java/fxml/funkcio-valaszto.fxml", "Kreatív Ötletcentrum Raktárkezelő", 300, 400
                );
                funkcio.getStage().show();
            }
            else{
                //System.out.println("Nincs jogod bejelentkezni.");
                alert("Nincs jogod bejelentkezni.");
            }
        } catch (IOException e) {
            hibaKiir(e);
        }
    }
}
