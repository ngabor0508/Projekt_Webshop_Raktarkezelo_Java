package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;

import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Controller;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Termek;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.TermekApi;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.Spinner;
import javafx.scene.control.TextField;

public class HozzaadController extends Controller {
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
    public void onHozzaadButtonClick(ActionEvent actionEvent){
        {
            String kodszam = inputKodszam.getText().trim();
            String name = inputName.getText().trim();
            int price = 0;
            int quantity = 0;
            String url = inputUrl.getText().trim();
            int kategoriaIndex = inputKategoria.getSelectionModel().getSelectedIndex();
            if(kodszam.isEmpty()){
                alert("Kódszám megadása kötelező!");
                return;
            }

            if(name.isEmpty()){
                alert("Név megadása kötelező");
                return;

            }

            try {
                price = inputPrice.getValue();
            } catch (NullPointerException ex){
                alert("Az ár megadása kötelező!");
                return;
            } catch (Exception ex){
                alert("Az árnak minimum 1Ft-nak kell lennie!");
                return;
            }
            if(price < 1){
                alert("Az árnak minimum 1Ft-nak kell lennie!");
                return;
            }

            try {
                quantity = inputQuantity.getValue();
            } catch (NullPointerException ex){
                alert("A mennyiség megadása kötelező!");
                return;
            } catch (Exception ex){
                alert("A mennyiség megadása kötelező!");
                return;
            }

            if(url.isEmpty()){
                alert("Url megadása kötelező!");
                return;
            }

            if(kategoriaIndex == -1){
                alert("Kategória kiválasztása kötelező!");
                return;
            }
            String kategoria = (String) inputKategoria.getValue();


            try {
                Termek ujTermek = new Termek(0,kodszam, name, price, quantity, url, kategoria);
                Termek letrehozott = TermekApi.termekHozzaadasa(ujTermek);
                if(letrehozott != null){
                    alert("Termék hozzáadása sikeres!");
                }
                else {
                    alert("Termék hozzáadása sikertelen!");
                }
            } catch (Exception e) {
                hibaKiir(e);
            }
        }
    }
}
