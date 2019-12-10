package ies.nervion.rmanzano.callback;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class VoidLibroCallback implements Callback<Void> {

    @Override
    public void onResponse(Call<Void> call, Response<Void> resp) {
        int code;
        String message;

        code = resp.code();
        message = resp.message();
    }

    @Override
    public void onFailure(Call<Void> call, Throwable throwable) {

    }
}
