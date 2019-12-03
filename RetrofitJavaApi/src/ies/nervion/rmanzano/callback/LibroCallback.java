package ies.nervion.rmanzano.callback;

import ies.nervion.rmanzano.clases.Libro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import okhttp3.Headers;

import java.util.List;


public class LibroCallback implements Callback<List<Libro>>{

	@Override
	public void onFailure(Call<List<Libro>> arg0, Throwable arg1) {
		// TODO Auto-generated method stub
		int i;
		
		i=0;
		
		
		
	}

	@Override
	public void onResponse(Call<List<Libro>> arg0, Response<List<Libro>> resp) {
		// TODO Auto-generated method stub
		
	List<Libro> libro = null;
	String contentType;
	int code;
	String message;
	boolean isSuccesful;
	
	libro = resp.body();
	
	Headers cabeceras = resp.headers();
	contentType = cabeceras.get("Content-Type");
	code = resp.code();
	message = resp.message();
	isSuccesful = resp.isSuccessful();

	
	libro.stream().forEach(a -> System.out.println(a.getId() + a.getTitulo() + a.getNumpag()));
	}
	

}
