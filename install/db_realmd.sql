-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 04 Avril 2010 à 19:24
-- Version du serveur: 5.1.41
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `realmd`
--

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `aid` smallint(5) unsigned DEFAULT NULL,
  `points` smallint(5) unsigned DEFAULT NULL,
  `date_vote` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `votes`
--