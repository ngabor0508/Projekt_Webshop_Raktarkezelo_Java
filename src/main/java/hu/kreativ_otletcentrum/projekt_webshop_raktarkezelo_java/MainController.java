package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;


public class MainController {

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
    }

    @FXML
    public void onHozzaadasButtonClick(ActionEvent actionEvent) {
    }

    @FXML
    public void onModositasButtonClick(ActionEvent actionEvent) {
    }

    @FXML
    public void onTorlesButtonClick(ActionEvent actionEvent) {
    }
}