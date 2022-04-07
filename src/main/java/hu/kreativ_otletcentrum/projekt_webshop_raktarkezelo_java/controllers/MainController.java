package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;

import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Controller;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Termek;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.TermekApi;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;

import java.io.IOException;
import java.util.List;


public class MainController extends Controller {

    @FXML
    private TableView<Termek> termekTable;
    @FXML
    private TableColumn<Termek, Integer> colId;
    @FXML
    private TableColumn<Termek, String> colKodszam;
    @FXML
    private TableColumn<Termek, String> colName;
    @FXML
    private TableColumn<Termek, Integer> colPrice;
    @FXML
    private TableColumn<Termek, Integer> colQuantity;
    @FXML
    private TableColumn<Termek, String> colKepUrl;
    @FXML
    private TableColumn<Termek, String> colKategoria;

    public void initialize(){
        colId.setCellValueFactory(new PropertyValueFactory<>("id"));
        colKodszam.setCellValueFactory(new PropertyValueFactory<>("kodszam"));
        colName.setCellValueFactory(new PropertyValueFactory<>("name"));
        colPrice.setCellValueFactory(new PropertyValueFactory<>("price"));
        colQuantity.setCellValueFactory(new PropertyValueFactory<>("quantity"));
        colKepUrl.setCellValueFactory(new PropertyValueFactory<>("url"));
        colKategoria.setCellValueFactory(new PropertyValueFactory<>("kategoria"));
        termekListaFeltolt();
    }

    private void termekListaFeltolt(){
        try {
            List<Termek> termekList = TermekApi.getTermekek();
            termekTable.getItems().clear();
            for (Termek termek:termekList) {
                termekTable.getItems().add(termek);
            }
        } catch (IOException e) {
            hibaKiir(e);
        }
    }

    @FXML
    public void onHozzaadasButtonClick(ActionEvent actionEvent) {
        try {
            Controller hozzaadas = ujAblak("hozzaad-view.fxml", "Termék hozzáadása",
                    320, 400);
            hozzaadas.getStage().setOnCloseRequest(event -> termekListaFeltolt());
            hozzaadas.getStage().show();
        } catch (Exception e) {
            hibaKiir(e);
        }
    }

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
        inputQuantity.setValue(modositando.getQuantity());
        inputUrl.setText(modositando.getUrl());
        inputKategoria.setText(modositando.getKategoria());
    }
}



    @FXML
    public void onTorlesButtonClick(ActionEvent actionEvent) {
    }
}