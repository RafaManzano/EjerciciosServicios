package ies.nervion.rmanzano.clases;



public class Libro {
	private int id;
	private String titulo;
	private String numpag;

    public Libro() {

	}

	public Libro(int id, String titulo, String numpag) {
		this.id = id;
		this.titulo = titulo;
		this.numpag = numpag;
	}

	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getNumpag() {
		return numpag;
	}
	public void setNumpag(String numpag) {
		this.numpag = numpag;
	}
	public String getTitulo() {
		return titulo;
	}
	public void setTitulo(String titulo) {
		this.titulo = titulo;
	}
	
	

}
