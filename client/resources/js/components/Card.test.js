import React from 'react';
import renderer from 'react-test-renderer';
import { describe, expect, test } from '@jest/globals';
import Card from './Card';

describe('snapshot testing', () => {

    test('the card renders consistently', () => {
        const component = {
            component_id: 1,
            outcome: '',
        };

        const card = renderer.create(<Card key={1} component={component}/> );
        const tree = card.toJSON();
        expect(tree).toMatchSnapshot();
    });  
});
