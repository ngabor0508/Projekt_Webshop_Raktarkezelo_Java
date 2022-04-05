package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.stage.Stage;

public abstract class Controller {
    protected Stage stage;

    public Stage getStage(){
        return stage;
    }

    protected void alert(String uzenet){
        Alert alert = new Alert(Alert.AlertType.NONE);
        alert.setContentText(uzenet);
        alert.getButtonTypes().add(ButtonType.OK);
        alert.show();
    }
}
