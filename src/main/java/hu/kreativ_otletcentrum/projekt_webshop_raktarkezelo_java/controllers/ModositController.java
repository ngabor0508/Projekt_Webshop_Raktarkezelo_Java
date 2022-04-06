package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;

import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Controller;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.Spinner;
import javafx.scene.control.TextField;

public class ModositController extends Controller {
    @FXML
    private TextField inputKodszam;
    @FXML
    private TextField inputName;
    @FXML
    private Spinner inputPrice;
    @FXML
    private Spinner inputQuantity;
    @FXML
    private TextField inputUrl;
    @FXML
    private ChoiceBox inputKategoria;




    @FXML
    public void onModositButtonClick(ActionEvent actionEvent) {
    }
}
