import { handleRowVariables, handleRowOptions } from '../middle-row/sync'
import rtEvents from '../../../src/js/events';

rtEvents.on(
	'rt:footer:sync:collect-variable-descriptors',
	(variableDescriptors) => {
		variableDescriptors['top-row'] = handleRowVariables
	}
)

rtEvents.on('ct:footer:sync:item:top-row', (changeDescriptor) =>
	handleRowOptions({
		selector: '.rt-footer [data-row="top"]',
		changeDescriptor,
	})
)
