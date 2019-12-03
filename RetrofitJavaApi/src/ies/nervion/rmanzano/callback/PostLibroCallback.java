package ies.nervion.rmanzano.callback;

import ies.nervion.rmanzano.clases.Libro;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import okhttp3.Headers;

import java.io.IOException;
import java.util.List;


public class PostLibroCallback implements Callback<Libro> {


    @Override
    public void onResponse(Call<Libro> call, Response<Libro> response) {
        // TODO Auto-generated method stub
        Libro libro = null;
        String contentType;
        int code;
        String message;
        boolean isSuccesful;

        code = response.code();
        if(response.isSuccessful()) {

        }

        //System.out.println(libro.get(0).getId()+" "+libro.get(0).getTitulo()+" "+libro.get(0).getNumpag());
    }

    @Override
    public void onFailure(Call<Libro> call, Throwable throwable) {
        int i = 0;
    }
}
