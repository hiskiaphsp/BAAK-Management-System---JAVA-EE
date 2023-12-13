package com.project.baakapi.model;

import jakarta.persistence.*;
import java.io.Serializable;
import java.util.Date;
import java.util.List;

@Entity
@Table(name = "users")
public class User implements Serializable {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private Long id;

    @Column(name = "name", nullable = false)
    private String name;

    @Column(name = "email", nullable = false, unique = true)
    private String email;

    @Column(name = "nim")
    private String nim;

    @Column(name = "ktp")
    private String ktp;

    @Column(name = "no_hp")
    private String noHp;

    @Column(name = "email_verified_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date emailVerifiedAt;

    @Column(name = "password", nullable = false)
    private String password;

    @Column(name = "two_factor_secret")
    private String twoFactorSecret;

    @Column(name = "two_factor_recovery_codes")
    private String twoFactorRecoveryCodes;

    @Column(name = "two_factor_confirmed_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date twoFactorConfirmedAt;

    @Column(name = "remember_token")
    private String rememberToken;

    @Column(name = "current_team_id")
    private Long currentTeamId;

    @Column(name = "profile_photo_path")
    private String profilePhotoPath;

    @Column(name = "created_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date createdAt;

    @Column(name = "updated_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date updatedAt;

    @OneToMany(mappedBy = "user")
    private List<RequestSurat> requestSurats;

    // Constructors
    public User() {
        // Default constructor
    }

    public User(Long id, String name, String email, String nim, String ktp, String noHp, Date emailVerifiedAt, String password, String twoFactorSecret,
                String twoFactorRecoveryCodes, Date twoFactorConfirmedAt, String rememberToken, Long currentTeamId, String profilePhotoPath, Date createdAt, Date updatedAt) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.nim = nim;
        this.ktp = ktp;
        this.noHp = noHp;
        this.emailVerifiedAt = emailVerifiedAt;
        this.password = password;
        this.twoFactorSecret = twoFactorSecret;
        this.twoFactorRecoveryCodes = twoFactorRecoveryCodes;
        this.twoFactorConfirmedAt = twoFactorConfirmedAt;
        this.rememberToken = rememberToken;
        this.currentTeamId = currentTeamId;
        this.profilePhotoPath = profilePhotoPath;
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

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getNim() {
        return nim;
    }

    public void setNim(String nim) {
        this.nim = nim;
    }

    public String getKtp() {
        return ktp;
    }

    public void setKtp(String ktp) {
        this.ktp = ktp;
    }

    public String getNoHp() {
        return noHp;
    }

    public void setNoHp(String noHp) {
        this.noHp = noHp;
    }

    public Date getEmailVerifiedAt() {
        return emailVerifiedAt;
    }

    public void setEmailVerifiedAt(Date emailVerifiedAt) {
        this.emailVerifiedAt = emailVerifiedAt;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getTwoFactorSecret() {
        return twoFactorSecret;
    }

    public void setTwoFactorSecret(String twoFactorSecret) {
        this.twoFactorSecret = twoFactorSecret;
    }

    public String getTwoFactorRecoveryCodes() {
        return twoFactorRecoveryCodes;
    }

    public void setTwoFactorRecoveryCodes(String twoFactorRecoveryCodes) {
        this.twoFactorRecoveryCodes = twoFactorRecoveryCodes;
    }

    public Date getTwoFactorConfirmedAt() {
        return twoFactorConfirmedAt;
    }

    public void setTwoFactorConfirmedAt(Date twoFactorConfirmedAt) {
        this.twoFactorConfirmedAt = twoFactorConfirmedAt;
    }

    public String getRememberToken() {
        return rememberToken;
    }

    public void setRememberToken(String rememberToken) {
        this.rememberToken = rememberToken;
    }

    public Long getCurrentTeamId() {
        return currentTeamId;
    }

    public void setCurrentTeamId(Long currentTeamId) {
        this.currentTeamId = currentTeamId;
    }

    public String getProfilePhotoPath() {
        return profilePhotoPath;
    }

    public void setProfilePhotoPath(String profilePhotoPath) {
        this.profilePhotoPath = profilePhotoPath;
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
        return "User{" +
                "id=" + id +
                ", name='" + name + '\'' +
                ", email='" + email + '\'' +
                ", nim='" + nim + '\'' +
                ", ktp='" + ktp + '\'' +
                ", noHp='" + noHp + '\'' +
                ", emailVerifiedAt=" + emailVerifiedAt +
                ", password='" + password + '\'' +
                ", twoFactorSecret='" + twoFactorSecret + '\'' +
                ", twoFactorRecoveryCodes='" + twoFactorRecoveryCodes + '\'' +
                ", twoFactorConfirmedAt=" + twoFactorConfirmedAt +
                ", rememberToken='" + rememberToken + '\'' +
                ", currentTeamId=" + currentTeamId +
                ", profilePhotoPath='" + profilePhotoPath + '\'' +
                ", createdAt=" + createdAt +
                ", updatedAt=" + updatedAt +
                '}';
    }
}
