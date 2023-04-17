-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 avr. 2023 à 17:31
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel_projet_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cites`
--

CREATE TABLE `cites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lib_cite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_cite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_cite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_logement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cites`
--

INSERT INTO `cites` (`id`, `lib_cite`, `nom_cite`, `adresse_cite`, `nb_logement`, `agence`, `created_at`, `updated_at`) VALUES
(4, 'BBB-001', 'Cite Nambinintsoa', 'Ambalavao', '15', 'Fianarantsoa', '2023-02-22 17:24:26', '2023-02-22 17:24:26'),
(5, 'BBB-003', 'Cite prefa', 'Ankatso', '10', 'Antananarivo', '2023-02-22 17:24:50', '2023-04-14 10:13:41'),
(9, 'BBB-002', 'Cite Kambana', 'Ambatofiandrahana', '40', 'Ambositra', '2023-04-14 10:13:21', '2023-04-14 10:13:21'),
(11, 'BBB-005', 'cite Tsimanampaharoa', 'Toliara', '20', 'Toliara', '2023-04-15 05:02:14', '2023-04-15 05:02:14'),
(12, 'BBB-0010', 'Cite prefa20', 'Ankatso', '10', 'Antananarivo', '2023-04-15 05:12:16', '2023-04-15 05:12:16');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_cli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_cli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_cli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu_cli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_cli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom_cli`, `prenom_cli`, `adresse_cli`, `lieu_cli`, `tel_cli`, `created_at`, `updated_at`) VALUES
(1, 'alain', 'nirina albert', 'tana', 'lafra', '0345678854', NULL, NULL),
(2, 'tahiry', 'tsoa', 'tana', 'anosibe', '0345689625', '2023-02-17 19:41:19', '2023-02-17 19:41:19'),
(3, 'teza', 'hiany', 'ambositra', 'amabanidôlaka', '0345678850', '2023-02-17 20:19:42', '2023-02-17 20:22:41'),
(6, 'Mariah', 'Valimbavaka', 'Ambositra', 'Ambondomisotra', '0325689562', '2023-02-20 17:08:46', '2023-02-20 17:26:53'),
(7, 'HASINA', 'Efraime', 'fianarantsoa', 'andrainjaka', '0345678956', '2023-02-20 17:12:52', '2023-02-20 17:25:56'),
(11, 'hery', 'nantenaina', 'lot :210/36 Tana', 'Antsirabe', '034568952', '2023-03-12 03:29:39', '2023-03-12 03:29:39'),
(12, 'Erick', 'Sylvano', 'Soanierana', 'Fianarantsoa', '0345612345', '2023-03-12 10:24:42', '2023-03-12 10:24:42');

-- --------------------------------------------------------

--
-- Structure de la table `deuxiemes`
--

CREATE TABLE `deuxiemes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `logements_id` bigint(20) UNSIGNED NOT NULL,
  `montant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `deuxiemes`
--

INSERT INTO `deuxiemes` (`id`, `clients_id`, `logements_id`, `montant`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '47500000', '2023-03-11 11:34:17', '2023-03-11 11:34:17'),
(2, 3, 2, '37500000', '2023-03-11 11:37:02', '2023-03-11 11:37:02'),
(3, 2, 2, '37500000', '2023-03-11 11:38:48', '2023-03-11 11:38:48'),
(4, 1, 1, '49900000', '2023-03-12 12:42:10', '2023-03-12 12:42:10'),
(6, 7, 3, '50000000', '2023-04-15 05:20:52', '2023-04-15 05:20:52');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE `logements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num_log` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_chambre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `superficie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lib_cite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_log` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`id`, `num_log`, `nb_chambre`, `superficie`, `lib_cite`, `prix_log`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'B-13', '8', '200', 'BBB-001', '50000000', 'indisponible', '2023-03-10 16:46:44', '2023-03-10 16:55:30'),
(2, 'B-20', '10', '100', 'BBB-001', '40000000', 'indisponible', '2023-03-10 16:47:12', '2023-03-10 19:27:05'),
(3, 'B-01', '6', '20', 'BBB-001', '100000000', 'indisponible', '2023-03-11 18:23:30', '2023-03-11 19:56:58'),
(4, 'B-02', '4', '20', 'BBB-001', '30000000', 'indisponible', '2023-03-11 18:24:44', '2023-03-11 20:11:33'),
(5, 'B-03', '10', '50', 'BBB-001', '75000000', 'indisponible', '2023-03-11 18:25:35', '2023-03-12 09:19:02'),
(6, 'B-05', '12', '40', 'BBB-001', '92000000', 'indisponible', '2023-03-11 18:26:49', '2023-03-12 14:46:36'),
(7, 'B-06', '9', '15', 'BBB-001', '75000000', 'indisponible', '2023-03-11 18:27:54', '2023-04-15 05:14:28'),
(11, 'B-10', '10', '50', 'BBB-005', '50000000', 'disponible', '2023-04-15 05:03:05', '2023-04-15 05:03:05'),
(12, 'B-15', '16', '150', 'BBB-001', '79000000', 'disponible', '2023-04-15 05:04:19', '2023-04-15 05:04:19'),
(13, 'B-130', '10', '200', 'BBB-0010', '40000000', 'disponible', '2023-04-15 05:12:52', '2023-04-15 05:12:52');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_17_204630_create_client_table', 1),
(6, '2023_02_22_181058_create_cite_table', 2),
(7, '2023_02_22_185700_create_cites_table', 3),
(8, '2023_02_23_092020_create_logements_table', 4),
(10, '2023_02_27_185240_create_ventes_table', 5),
(11, '2023_03_10_193853_update_logements_table', 6),
(13, '2023_03_10_212255_create_deuxiemes_table', 7);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `num_log` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_vente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_paye` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_vente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_paye` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id`, `clients_id`, `num_log`, `type_vente`, `mode_paye`, `date_vente`, `montant_paye`, `reste`, `created_at`, `updated_at`) VALUES
(1, 2, '2', 'Par Crédit', 'Une tranche', '2023-03-10', '40000000', '0', '2023-03-10 16:55:30', '2023-03-11 11:38:48'),
(2, 1, '1', 'Par Crédit', 'Une tranche', '2023-03-11', '50000000', '0', '2023-03-10 19:27:05', '2023-03-12 12:42:10'),
(3, 7, '3', 'Par montant', 'Deux tranche', '2023-03-12', '100000000', '0', '2023-03-11 19:56:58', '2023-04-15 05:20:52'),
(4, 2, '4', 'Par Crédit', 'Une tranche', '2023-03-12', '30000000', '0', '2023-03-11 20:11:33', '2023-03-11 20:11:33'),
(5, 6, '5', 'Par Crédit', 'Deux tranche', '2023-03-12', '37500000', '37500000', '2023-03-12 09:19:02', '2023-03-12 09:19:02'),
(6, 12, '6', 'Par Crédit', 'Une tranche', '2023-03-12', '92000000', '0', '2023-03-12 14:46:36', '2023-03-12 14:46:36'),
(7, 12, '7', 'Par montant', 'Deux tranche', '2023-04-15', '37500000', '37500000', '2023-04-15 05:14:28', '2023-04-15 05:14:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cites`
--
ALTER TABLE `cites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `deuxiemes`
--
ALTER TABLE `deuxiemes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deuxiemes_clients_id_foreign` (`clients_id`),
  ADD KEY `deuxiemes_logements_id_foreign` (`logements_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventes_clients_id_foreign` (`clients_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cites`
--
ALTER TABLE `cites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `deuxiemes`
--
ALTER TABLE `deuxiemes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `deuxiemes`
--
ALTER TABLE `deuxiemes`
  ADD CONSTRAINT `deuxiemes_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `deuxiemes_logements_id_foreign` FOREIGN KEY (`logements_id`) REFERENCES `logements` (`id`);

--
-- Contraintes pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `ventes_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
