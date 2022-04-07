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
    public void onModositasButtonClick(ActionEvent actionEvent) {
        int selectedIndex = termekTable.getSelectionModel().getSelectedIndex();
        if(selectedIndex == -1){
            alert("A módosításhoz előbb válasszon ki egy elemet a táblázatból");
            return;
        }
        Termek modositando = termekTable.getSelectionModel().getSelectedItem();
        try {
            ModositController modositas = (ModositController) ujAblak("modosit-view.fxml", "Termék módosítása",
                    320, 400);
            modositas.setModositando(modositando);
            modositas.getStage().setOnHiding(event -> termekTable.refresh());
            modositas.getStage().show();
        } catch (IOException e) {
            hibaKiir(e);
        }
    }

    @FXML
    public void onTorlesButtonClick(ActionEvent actionEvent) {
        int selectedIndex = termekTable.getSelectionModel().getSelectedIndex();
        if(selectedIndex == -1){
            alert("A törléshez előbb válasszon ki egy elemet a táblázatból");
            return;
        }
        Termek torlendoTermek = termekTable.getSelectionModel().getSelectedItem();
        if(!confirm("Biztos, hogy törölni szeretné az alábbi terméket:" + torlendoTermek.getKodszam())){
            return;
        }
        try {
            boolean sikeres = TermekApi.termekTorlese(torlendoTermek.getId());
            alert(sikeres?  "Sikeres a törlés" : "Sikertelen törlés");
            termekListaFeltolt();
        } catch (IOException e) {
            hibaKiir(e);
        }
    }
}