package com.project.baakapi.model;

import jakarta.persistence.*;
import java.io.Serializable;
import java.util.Date;

@Entity
@Table(name = "izin_mahasiswa")
public class IzinMahasiswa implements Serializable {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private Long id;

    @ManyToOne
    @JoinColumn(name = "user_id", nullable = false)
    private User user;

    @Column(name = "jenis", nullable = false)
    private String jenis;

    @Column(name = "waktu_mulai")
    @Temporal(TemporalType.TIMESTAMP)
    private Date waktuMulai;

    @Column(name = "waktu_selesai")
    @Temporal(TemporalType.TIMESTAMP)
    private Date waktuSelesai;

    @Column(name = "status", nullable = false)
    private String status;

    @Column(name = "created_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date createdAt;

    @Column(name = "updated_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date updatedAt;

    // Constructors
    public IzinMahasiswa() {
        // Default constructor
    }

    public IzinMahasiswa(Long id, User user, String jenis, Date waktuMulai, Date waktuSelesai, String status, Date createdAt, Date updatedAt) {
        this.id = id;
        this.user = user;
        this.jenis = jenis;
        this.waktuMulai = waktuMulai;
        this.waktuSelesai = waktuSelesai;
        this.status = status;
        this.createdAt = createdAt;
        this.updatedAt = updatedAt;
    }

    // Getters and setters

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }

    public String getJenis() {
        return jenis;
    }

    public void setJenis(String jenis) {
        this.jenis = jenis;
    }

    public Date getWaktuMulai() {
        return waktuMulai;
    }

    public void setWaktuMulai(Date waktuMulai) {
        this.waktuMulai = waktuMulai;
    }

    public Date getWaktuSelesai() {
        return waktuSelesai;
    }

    public void setWaktuSelesai(Date waktuSelesai) {
        this.waktuSelesai = waktuSelesai;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
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
        return "IzinMahasiswa{" +
                "id=" + id +
                ", user=" + user +
                ", jenis='" + jenis + '\'' +
                ", waktuMulai=" + waktuMulai +
                ", waktuSelesai=" + waktuSelesai +
                ", status='" + status + '\'' +
                ", createdAt=" + createdAt +
                ", updatedAt=" + updatedAt +
                '}';
    }
}
