const query = `
  query {
    users {
      id
      fullName
      email
    }
  }
`;

const response = await fetch('/graphql', {
  method: 'POST',
  headers: {
    Authorization: `Bearer ${token}`,
    'Content-Type': 'application/json',
  },
  body: JSON.stringify({ query }),
});

const result = await response.json();
