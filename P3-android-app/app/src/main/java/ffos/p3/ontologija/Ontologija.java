package ffos.p3.ontologija;

import java.io.Serializable;

public class Ontologija implements Serializable {

    public Ontologija() {
        this.sifra = sifra;
        this.film = film;
        this.glumac = glumac;
        this.zanr = zanr;
        this.nagrada = nagrada;
        this.godinaIzlaska = godinaIzlaska;
        this.trajanje = trajanje;
    }

    private int sifra;
    private String film;
    private String glumac;
    private String zanr;
    private String nagrada;
    private int godinaIzlaska;
    private String trajanje;

    public int getSifra() {
        return sifra;
    }

    public void setSifra(int sifra) {
        this.sifra = sifra;
    }

    public String getFilm() {
        return film;
    }

    public void setFilm(String film) {
        this.film = film;
    }

    public String getGlumac() {
        return glumac;
    }

    public void setGlumac(String glumac) {
        this.glumac = glumac;
    }

    public String getZanr() {
        return zanr;
    }

    public void setZanr(String zanr) {
        this.zanr = zanr;
    }

    public String getNagrada() {
        return nagrada;
    }

    public void setNagrada(String nagrada) {
        this.nagrada = nagrada;
    }

    public int getGodinaIzlaska() {
        return godinaIzlaska;
    }

    public void setGodinaIzlaska(int godinaIzlaska) {
        this.godinaIzlaska = godinaIzlaska;
    }

    public String getTrajanje() {
        return trajanje;
    }

    public void setTrajanje(String trajanje) {
        this.trajanje = trajanje;
    }
}
