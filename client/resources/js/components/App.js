
import React, { Component } from 'react';
import Card from './Card';
import axios from 'axios';
import range from 'lodash.range'

export default class App extends Component {
  constructor(props) {
    super(props);  
    this.state = { 
      components: []
    }; 
  }

  componentDidMount() {
    const promises = range(1, 101).map(item => {
      return axios.get('http://127.0.0.1:8881', { params: { id: item }}).then(res => res.data)
    })
    Promise.all(promises).then(data => {
      this.setState({ components: data })
    })
  }

  renderCards() {
    return this.state.components.map((component, index) => (
      <Card key={index} component={component}/> 
    ));
  }

  render() {
    return(
        <div className="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">  
            {this.renderCards()}        
        </div>
    )
  }
}
