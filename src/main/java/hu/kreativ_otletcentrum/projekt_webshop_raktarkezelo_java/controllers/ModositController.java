package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;

import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Controller;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Termek;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.api.TermekApi;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.Spinner;
import javafx.scene.control.TextField;

import java.io.IOException;

public class ModositController extends Controller {
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
    private Termek modositando;

    @FXML
    public void onModositButtonClick(ActionEvent actionEvent) {
        String kodszam = inputKodszam.getText().trim();
        String name = inputName.getText().trim();
        int price = 0;
        int quantity = 0;
        String url = inputUrl.getText().trim();
        int kategoriaIndex = inputKategoria.getSelectionModel().getSelectedIndex();

        if (kodszam.isEmpty()) {
            alert("Kódszám megadása kötelező!");
            return;
        }

        if (name.isEmpty()) {
            alert("Név megadása kötelező");
            return;
        }

        try {
            price = inputPrice.getValue();
        } catch (NullPointerException ex) {
            alert("Az ár megadása kötelező!");
            return;
        } catch (Exception ex) {
            alert("Az árnak minimum 1Ft-nak kell lennie!");
            return;
        }
        if (price < 1) {
            alert("Az árnak minimum 1Ft-nak kell lennie!");
            return;
        }

        try {
            quantity = inputQuantity.getValue();
        } catch (NullPointerException ex) {
            alert("A mennyiség megadása kötelező!");
            return;
        } catch (Exception ex) {
            alert("A mennyiség megadása kötelező!");
            return;
        }

        if (url.isEmpty()) {
            alert("Url megadása kötelező!");
            return;
        }

        if (kategoriaIndex == -1) {
            alert("Értékelés kiválasztása kötelező!");
            return;
        }
        String kategoria = (String) inputKategoria.getValue();

        modositando.setKodszam(kodszam);
        modositando.setName(name);
        modositando.setPrice(price);
        modositando.setQuantity(quantity);
        modositando.setUrl(url);
        modositando.setKategoria(kategoria);

        try {
            Termek modositott = TermekApi.termekModositasa(modositando);
            if (modositott != null) {
                alertWait("Sikeres módosítás!");
                this.stage.close();
            } else {
                alert("Sikertelen módosítás!");

            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public Termek getModositando() {
        return modositando;
    }

    public void setModositando(Termek modositando) {
        this.modositando = modositando;
        ertekekBeallitasa();
    }

    private void ertekekBeallitasa() {
        inputKodszam.setText(modositando.getKodszam());
        inputName.setText(modositando.getName());
        inputPrice.getValueFactory().setValue(modositando.getPrice());
        inputQuantity.getValueFactory().setValue(modositando.getQuantity());
        inputUrl.setText(modositando.getUrl());
        inputKategoria.setValue(modositando.getKategoria());
    }
}
