// This file is part of Moodle - http://moodle.org/
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

/**
 * GGB utils for the qtype_geogebra plugin javascript.
 *
 * @module     qtype_geogebra/ggbutils
 * @copyright  2022 ISB Bayern
 * @author     Philipp Memmel
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

export const disableSubmitButtons = (parentNode) => {
    // We need to make every button currently present and newly created in the GGB applet behave like
    // a standard button to avoid submitting the question form when being clicked.
    const buttonAddedObserver = new MutationObserver(mutations =>
        mutations
            .filter(mutation => mutation.type === 'childList' && mutation.addedNodes && mutation.addedNodes.length > 0)
            .forEach(mutation => {
                // We need to find all child elements of type button, also deeper in the tree.
                const treeWalker = document.createTreeWalker(mutation.target);
                const nodes = [];
                let currentNode = treeWalker.currentNode;
                while (currentNode) {
                    nodes.push(currentNode);
                    currentNode = treeWalker.nextNode();
                }
                nodes.filter(node => node.nodeName === 'BUTTON').forEach(node => {
                    // If we find a button whose type is 'submit' we set its type to 'button' to avoid it being able to
                    // trigger a submission of the moodle question form.
                    if (node.type === 'submit') {
                        node.type = 'button';
                    }
                });
            })
    );
    const observerParameters = {attributes: false, childList: true, characterData: false, subtree: true};
    buttonAddedObserver.observe(parentNode, observerParameters);
};
