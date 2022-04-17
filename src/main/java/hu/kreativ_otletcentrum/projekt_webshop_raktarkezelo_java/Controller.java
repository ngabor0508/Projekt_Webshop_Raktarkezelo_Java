package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

import javafx.application.Platform;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.control.DialogPane;
import javafx.scene.image.Image;
import javafx.stage.Stage;

import java.io.IOException;
import java.util.Optional;
import java.util.Timer;
import java.util.TimerTask;

public abstract class Controller {
    protected Stage stage;
    private static Image icon = new Image(Controller.class.getResourceAsStream("/hu/kreativ_otletcentrum/projekt_webshop_raktarkezelo_java/images/kreativ_logo.png"));
    protected DialogPane dialogPane;


    public Stage getStage(){
        return stage;
    }

    protected void alert(String uzenet){
        Alert alert = new Alert(Alert.AlertType.NONE);
        alert.setContentText(uzenet);
        alert.getButtonTypes().add(ButtonType.OK);
        dialogPane = alert.getDialogPane();
        Stage stage = (Stage) dialogPane.getScene().getWindow();
        stage.getIcons().add(icon);
        alert.show();
    }

    protected void alertWait(String uzenet){
        Alert alert = new Alert(Alert.AlertType.NONE);
        alert.setContentText(uzenet);
        alert.getButtonTypes().add(ButtonType.OK);
        dialogPane = alert.getDialogPane();
        Stage stage = (Stage) dialogPane.getScene().getWindow();
        stage.getIcons().add(icon);
        alert.showAndWait();
    }

    protected boolean confirm(String uzenet){
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Biztos?");
        alert.setHeaderText(uzenet);
        dialogPane = alert.getDialogPane();
        Stage stage = (Stage) dialogPane.getScene().getWindow();
        stage.getIcons().add(icon);
        Optional<ButtonType> result = alert.showAndWait();
        return result.get() == ButtonType.OK;
    }

    protected void hibaKiir(Exception e) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle("Hiba!");
        alert.setHeaderText(e.getClass().toString());
        alert.setContentText(e.getMessage());
        dialogPane = alert.getDialogPane();
        Stage stage = (Stage) dialogPane.getScene().getWindow();
        stage.getIcons().add(icon);
        Timer alertTimer = new Timer();
        alertTimer.schedule(new TimerTask() {
            @Override
            public void run() {
                Platform.runLater(() -> alert.show());
            }
        }, 500);
    }

    public static Controller ujAblak(String fxml, String title, int width, int height) throws IOException {
        Stage stage = new Stage();
        FXMLLoader fxmlLoader = new FXMLLoader(RaktarKezeloApp.class.getResource(fxml));
        Scene scene = new Scene(fxmlLoader.load(), width, height);
        stage.setTitle(title);
        stage.setScene(scene);
        stage.getIcons().add(icon);
        Controller controller = fxmlLoader.getController();
        controller.stage = stage;
        return controller;
    }
}
