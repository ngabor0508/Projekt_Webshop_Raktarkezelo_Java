package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.Spinner;
import javafx.scene.control.TextField;

public class HozzaadController extends Controller{
    @FXML
    private TextField inputKodszam;
    @FXML
    private TextField inputName;
    @FXML
    private Spinner<Integer> inputPrice;
    @FXML
    private Spinner<Integer> inputQuantity;
    @FXML
    private TextField inputUrl;
    @FXML
    private ChoiceBox inputKategoria;

    @FXML
    public void onHozzaadButtonClick(ActionEvent actionEvent) {
    }
}
