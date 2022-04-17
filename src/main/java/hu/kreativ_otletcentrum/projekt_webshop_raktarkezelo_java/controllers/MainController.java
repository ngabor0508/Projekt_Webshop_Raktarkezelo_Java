package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.controllers;

import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.Controller;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Termek;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.api.TermekApi;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;

import java.io.IOException;
import java.util.ArrayList;
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
    @FXML
    private TextField keresMezo;
    @FXML
    private ChoiceBox choicebox;

    List<Termek> termekList = new ArrayList<>();

    public void initialize(){
        colId.setCellValueFactory(new PropertyValueFactory<>("id"));
        colKodszam.setCellValueFactory(new PropertyValueFactory<>("kodszam"));
        colName.setCellValueFactory(new PropertyValueFactory<>("name"));
        colPrice.setCellValueFactory(new PropertyValueFactory<>("price"));
        colQuantity.setCellValueFactory(new PropertyValueFactory<>("quantity"));
        colKepUrl.setCellValueFactory(new PropertyValueFactory<>("url"));
        colKategoria.setCellValueFactory(new PropertyValueFactory<>("kategoria"));
        termekListaFeltolt();
        keres();
        szures();
    }

    private void termekListaFeltolt(){
        try {
            termekList = TermekApi.getTermekek();
            termekTable.getItems().clear();
            termekTable.getItems().addAll(termekList);
        } catch (IOException e) {
            hibaKiir(e);
        }
    }

    @FXML
    public void onHozzaadasButtonClick(ActionEvent actionEvent) {
        try {
            Controller hozzaadas = ujAblak("fxml/hozzaad-view.fxml", "Termék hozzáadása",
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
            ModositController modositas = (ModositController) ujAblak("fxml/modosit-view.fxml", "Termék módosítása",
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

    public void keres(){
        ObservableList<Termek> observableTermekList = FXCollections.observableArrayList(termekList);
        FilteredList<Termek> filteredTermekList = new FilteredList<>(observableTermekList, b -> true);

        keresMezo.textProperty().addListener((observable, oldValue, newValue) -> {
            filteredTermekList.setPredicate(Termek -> {
                if(newValue == null || newValue.isEmpty() || newValue.isBlank()){
                    return true;
                }

                String keresendoKifejezes = newValue.toLowerCase();

                if(Termek.getId().toString().contains(keresendoKifejezes)){
                    return true;
                } else if(Termek.getKodszam().toLowerCase().contains(keresendoKifejezes)){
                    return true;
                } else if(Termek.getName().toLowerCase().contains(keresendoKifejezes)){
                    return true;
                } else if(Termek.getPrice().toString().contains(keresendoKifejezes)){
                    return true;
                } else if(Termek.getQuantity().toString().contains(keresendoKifejezes)){
                    return true;
                } else if(Termek.getUrl().toLowerCase().contains(keresendoKifejezes)){
                    return true;
                } else if(Termek.getKategoria().toLowerCase().contains(keresendoKifejezes)){
                    return true;
                }
                else{
                    return false;
                }
            });
            SortedList<Termek> sortedTermekList = new SortedList<>(filteredTermekList);
            sortedTermekList.comparatorProperty().bind(termekTable.comparatorProperty());
            termekTable.getItems().clear();
            termekTable.getItems().addAll(sortedTermekList);
        });
    }

    public void szures(){
        ObservableList<Termek> observableSzurtTermekList = FXCollections.observableArrayList(termekList);
        choicebox.getSelectionModel().selectedItemProperty().addListener((v, oldValue, newValue) -> {
            if(newValue.equals("dekor")) {
                termekTable.getItems().clear();
                observableSzurtTermekList.clear();
                for (Termek termek : termekList) {
                    if (termek.getKategoria().equals("dekor")) {
                        observableSzurtTermekList.add(termek);
                    }
                }
                termekTable.getItems().addAll(observableSzurtTermekList);
            }
            else if(newValue.equals("alap")) {
                termekTable.getItems().clear();
                observableSzurtTermekList.clear();
                for (Termek termek : termekList) {
                    if (termek.getKategoria().equals("alap")) {
                        observableSzurtTermekList.add(termek);
                    }
                }
                termekTable.getItems().addAll(observableSzurtTermekList);
            }
            else if(newValue.equals("kész")) {
                termekTable.getItems().clear();
                observableSzurtTermekList.clear();
                for (Termek termek : termekList) {
                    if (termek.getKategoria().equals("kész")) {
                        observableSzurtTermekList.add(termek);
                    }
                }
                termekTable.getItems().addAll(observableSzurtTermekList);
            }
            else {
                termekListaFeltolt();
            }
        });
    }
}