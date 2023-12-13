package com.project.baakapi.model;

import jakarta.persistence.*;
import java.io.Serializable;
import java.util.Date;

@Entity
@Table(name = "product")
public class Product implements Serializable {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private Long id;

    @Column(name = "nama_product", nullable = false)
    private String namaProduct;

    @Column(name = "ukuran")
    private String ukuran;

    @Column(name = "harga", nullable = false)
    private Double harga;

    @Column(name = "stock", nullable = false)
    private Integer stock;

    @Column(name = "created_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date createdAt;

    @Column(name = "updated_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date updatedAt;

    // Constructors
    public Product() {
        // Default constructor
    }

    public Product(Long id, String namaProduct, String ukuran, Double harga, Integer stock, Date createdAt, Date updatedAt) {
        this.id = id;
        this.namaProduct = namaProduct;
        this.ukuran = ukuran;
        this.harga = harga;
        this.stock = stock;
        this.createdAt = createdAt;
        this.updatedAt = updatedAt;
    }

    public Product(String namaProduct, String ukuran, Double harga, Integer stock) {
        this.namaProduct = namaProduct;
        this.ukuran = ukuran;
        this.harga = harga;
        this.stock = stock;
        this.createdAt = new Date();
        this.updatedAt = new Date();
    }

    // Getters and setters

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNamaProduct() {
        return namaProduct;
    }

    public void setNamaProduct(String namaProduct) {
        this.namaProduct = namaProduct;
    }

    public String getUkuran() {
        return ukuran;
    }

    public void setUkuran(String ukuran) {
        this.ukuran = ukuran;
    }

    public Double getHarga() {
        return harga;
    }

    public void setHarga(Double harga) {
        this.harga = harga;
    }

    public Integer getStock() {
        return stock;
    }

    public void setStock(Integer stock) {
        this.stock = stock;
    }

    public Date getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Date createdAt) {
        this.createdAt = createdAt;
    }

    public Date getUpdatedAt() {
        return updatedAt;
    }

    public void setUpdatedAt(Date updatedAt) {
        this.updatedAt = updatedAt;
    }

    // toString method

    @Override
    public String toString() {
        return "Product{" +
                "id=" + id +
                ", namaProduct='" + namaProduct + '\'' +
                ", ukuran='" + ukuran + '\'' +
                ", harga=" + harga +
                ", stock=" + stock +
                ", createdAt=" + createdAt +
                ", updatedAt=" + updatedAt +
                '}';
    }
}