<?php
// This file is part of the mod_certifygen plugin for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
// Project implemented by the "Recovery, Transformation and Resilience Plan.
// Funded by the European Union - Next GenerationEU".
//
// Produced by the UNIMOODLE University Group: Universities of
// Valladolid, Complutense de Madrid, UPV/EHU, León, Salamanca,
// Illes Balears, Valencia, Rey Juan Carlos, La Laguna, Zaragoza, Málaga,
// Córdoba, Extremadura, Vigo, Las Palmas de Gran Canaria y Burgos.

/**
 *
 * @package    local_certifygencompanion
 * @copyright  2024 Proyecto UNIMOODLE
 * @author     UNIMOODLE Group (Coordinator) <direccion.area.estrategia.digital@uva.es>
 * @author     3IPUNT <contacte@tresipunt.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
global $USER;
if (is_primary_admin($USER->id)) {
    return;
}

$ADMIN->add(
    'root',
    new admin_category(
        'certifygencat',
        get_string('pluginname', 'mod_certifygen')
    ),
    'location'
);
// Model manager page access.
$modelsmanagersettings = new admin_externalpage(
    'certifygenmodelsmanager',
    get_string('modelsmanager', 'mod_certifygen'),
    '/mod/certifygen/modelmanager.php',
    'mod/certifygen:viewcontextcertificates'
);
$ADMIN->add('certifygencat', $modelsmanagersettings);
// See teacher requests.
$teacherrequestreportsettings = new admin_externalpage(
    'certifygenteacherrequestreport',
    get_string('certifygenteacherrequestreport', 'mod_certifygen'),
    '/mod/certifygen/teacherrequestreport.php',
    'mod/certifygen:viewcontextcertificates'
);
$ADMIN->add('certifygencat', $teacherrequestreportsettings);
// Search for ccertificates by code.
$searchforcerts = new admin_externalpage(
    'certifygensearchfor',
    get_string('certifygensearchfor', 'mod_certifygen'),
    '/mod/certifygen/code.php',
    'mod/certifygen:manage'
);
$ADMIN->add('certifygencat', $searchforcerts);
